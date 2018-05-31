<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Library\Matrix;
use App\Library\Stemmer;
require_once 'E:\OSPanel\domains\twit.loc\vendor\autoload.php';
//require  __DIR__.'vendor/autoload.php';

use Phpml\FeatureExtraction\TfIdfTransformer;
use PhpParser\Node\Stmt\Return_;

class ExploreController extends Controller
{
    public function strpos_by($string, $find) {
        $array = array(' ', ',', '.'); //знаки припинания
        $pos = stripos($string, $find);
        if (false !== $pos) {
            $before = $pos-1;
            $after = $pos+strlen($find);
            //if (array_search($string[$before] , $array) && array_search($string[$after] , $array)) {
            if (array_search($string[$before] , $array) && array_search($string[$after] , $array)) {
                return $pos;
            }
        }
    }

    public function analiz($word, $tweets){
        $sovpad=0;
        /*рабочее*/
        for ($i = 0; $i < count($word); $i++) {
            for($a = 0; $a < count($tweets); $a++) {

                if(stristr($tweets[$a], $word[$i]) === FALSE){
                    //echo $string[$a]."->".$word[$a].'<br>';
                    $matrix[$i][$a] = 0;
                }
                else {
                    //$matrix[$i][$a] = $tweets[$a].'->'.$word[$i];
                    $matrix[$i][$a] = 1;
                    //echo $string[$a]."->".$word[$i].'<br>';
                    $sovpad++;
                }
            }
        }

        /*наоборот*/
        /*for ($a = 0; $a < count($tweets); $a++) {
            for($i = 0; $i < count($word); $i++) {

                if(stristr($tweets[$a], $word[$i]) === FALSE){
                    //echo $string[$a]."->".$word[$a].'<br>';
                    $matrix[$i][$a] = 0;
                }
                else {
                    //$matrix[$i][$a] = $tweets[$a].'->'.$word[$i];
                    $matrix[$i][$a] = 1;
                    //echo $string[$a]."->".$word[$i].'<br>';
                    $sovpad++;
                }
            }
        }*/
        //echo $sovpad.'<br>';
        return ['m'=>$matrix,'s'=>$sovpad];
    }

    public function terms($subject){
        $Stemmer = new Stemmer();
        $subjectSport = DB::select('select words from subjects where subject = ?', $subject);
        //dump($subjectSport);

        foreach ($subjectSport as $sub){
            $sport = explode(',', $sub->words);
        }
//        echo "sport<br>";
//        dump($sport);

        //ДЛЯ ПРИММИНЕНИЯ ПОРТЕРА

        for($i=0; $i<count($sport); $i++){
            $sport[$i] = $Stemmer->getWordBase($sport[$i]);
        }
        //завершаем выборку по спорту
        //dump($sport);

        return $sport;
    }

    public function exploreMood(Request $request)
    {
        $Matrix = new Matrix();
        $Stemmer = new Stemmer();
        $perc =0;
        $sovpad =0;
        $matrix = array();
        $name = ['yurydud'];
///dump($request->tweets);

        $tweets = DB::select('select tweets from tweets where user = ?', $name);

        foreach ($tweets as $tw) {
            $tweetwords = explode(PHP_EOL, $tw->tweets);
        }

//        echo "tweetwords<br>";
//        dump($tweetwords);

        $column = [];
        $k=0;
        $sum =0;
        foreach ($tweetwords as $row)  {
            $column[$k] = explode(' ', $row);
            $k++;
        }
        for($d=0; $d<count($column); $d++){
            for($a=0; $a<count($column[$d]); $a++){
                $column[$d][$a] = $Stemmer->getWordBase($column[$d][$a]);
                $sum += count($column[$d][$a]);
            }
        }
        //echo "column <br>";
        //dump($column);
        //echo $sum;//сумма слов в твитах

        $wordStem=[];
        $w=0;
        foreach ($column as $qw){
            //$word[$i] = $qw[$i];
            $wordStem[$w] = implode(' ',$qw );
            $w++;

        }
//        echo "Worstem <br>";
//        dump($wordStem);

        //выборка по спорту


        $themes = [['спорт'],['кулинария'],['наука'],['литература'],['психология'],['медицина'],['политика'],['экономика']];
        //проверем вхождение
        for ($th=0; $th<count($themes); $th++){
            //dump($themes[$th]);
            $sub=$this->terms($themes[$th]);

            //dump($sub);
            //echo 'ANALIZ</br>';
            $entry = $this->analiz($sub, $wordStem);
            //dump($entry['s']);
            $perc = ($entry['s']/$sum)*100;
            $q[$th]=['title'=>$themes[$th][0],'perc'=>round($perc, 2)];
            //dump($themes[$th][0]);

            //$this->analiz($sport, $wordStem);
            //dump($entry);

    //        echo 'SVD</br>';
////        $USV = $Matrix->svd($matrix);
////        dump($USV['U']);

            /*echo 'SVD</br>';
            $SVD = $Matrix->svd($entry);
            dump($SVD['U']);
            dump($SVD['V']);*/

            //echo 'TF-IDF<br>';
            //$transformer = new TfIdfTransformer($entry);
            //$transformer->transform($entry);
            //dump($transformer);
//        foreach ($transformer as $r)
//            echo $r['-idf'].'<br>';

            //dump($transformer);   */
        }
        return view('result', ['description' => 'Moderna - Головна сторінка',
            'title' => 'Moderna - Головна сторінка'], ['themes' => $q]);
        //dump($themes);
        //dump($q);

        /*$word=array("деньги",
            "экономист",
            "экономия",
            "политика",
            "экономить",
            "наука",
            "страна",
            "предмет",
            "кризис",
            "бюджет",
            "банк",
            "финансы",
            "государство",
            "доллар",
            "валюта",
            "эконом",
            "математика",
            "рынок",
            "бизнес",
            "евро",
            "рубль",
            "кредит",
            "работа",
            "счёт",
            "президент",
            "макроэкономика",
            "институт",
            "инфляция",
            "зарплата",
            "экономка",
            "бухгалтер",
            "урок",
            "школа",
            "бухгалтерия",
            "дебет",
            "экономный",
            "учёба",
            "капитал",
            "магазин",
            "экономичный",
            "доход",
            "цифры",
            "налоги",
            "мир",
            "цена",
            "нефть",
            "продажа",
            "спад",
            "власть",
            "Россия",
            "курс",
            "люди",
            "учёт",
            "график",
            "развитие",
            "торговля",
            "хозяйство",
            "экономная",
            "микроэкономика",
            "ВВП",
            "биржа",
            "спрос",
            "товар",
            "кошелёк",
            "министр",
            "прибыль",
            "учебник",
            "общество",
            "профессия",
            "университет",
            "правительство",
            "экономический",
            "рост",
            "дефолт",
            "золото",
            "расчёт",
            "человек",
            "экспорт",
            "менеджер",
            "богатство",
            "дисциплина",
            "предложение",
            "предприятие",
            "обществознание",
            "инвестиции",
            "фонд",
            "акции",
            "сфера",
            "трата",
            "импорт",
            "расход",
            "расходы",
            "ресурсы",
            "управление",
            "вуз",
            "нет",
            "долг",
            "труд",
            "казна",
            "книга",
            "индустриализация",
            "глобализация",
            "пятилетка",
            "доходы",
            "процент",
            "клерк",
            "индекс",
            "капитализм",
            "ваучер",
            "индустрия",
            "выгода",
            "коммерция",
            "марксизм",
            "спекуляция",
            "банкнота",
            "инвестиция",
            "потребитель",
            "стабилизация",
            "структура",
            "завод",
            "дефицит",
            "флагман",
            "география",
            "новость",
            "доллары",
            "сбережение",
            "продавать",
            "услуга",
            "налог",
            "собственность",
            "потребность",
            "купля",
            "уклад",
            "студент",
            "анализ",
            "правление",
            "депутат",
            "капиталист",
            "конкурентоспособный",
            "центробанк",
            "безработица",
            "планирование",
            "демократия",
            "республика",
            "благо",
            "население",
            "продавец",
            "взаимодействие",
            "Польша",
            "переговоры",
            "состояние",
            "технология",
            "качество",
            "экономика страны",
            "мировая экономика",
            "экономический кризис",
            "рыночная экономика",
            "экономический рост",
            "должна быть экономной",
            "экономика предприятия",
            "экономика государства",
            "плохая экономика",
            "внутренняя экономика",
            "экономическая ситуация",
            "экономить деньги",
            "экономный человек",
            "государственная экономика"
        );
        $res = implode(",", $word);

        DB::insert('update subjects set words = ? where subject = ?', [$res,'экономика']);
        dump($word);*/
    }
}
