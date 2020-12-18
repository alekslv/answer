<?php
use PHPMailer\PHPMailer\PHPMailer;

require __DIR__.'/vendor/autoload.php';



$mail = new PHPMailer();
$mail->CharSet='utf-8';

$mail->setFrom('alekslv74@gmail.com', 'aleksandrmajlo');
$mail->addAddress('alekslv74@gmail.com', 'alekslv74');
$mail->Subject = 'Опросник';


$data = json_decode(file_get_contents("php://input"), true);
$sex = $data['sex'];
$address=str_replace(',','',$data['address']) ;
$Questions = $data['Questions'];
$DopQuestions = $data['DopQuestions'];



$dataTitle=[ ];
$dataTitle[]='address';
$dataTitle[]='sex';
$datas=[ ];
$datas[]=$address;
$datas[]=$sex;

$html='
 <h1>Результат теста</h1>
 <p>Пол: '.$sex.'</p> 
 <p>Адрес: '.$address.'</p> ';

//личные вопросы start *******************************************
$html.='
 <h2>Личные данные </h2>
 <table rules="all" style="border-color: #666;" cellpadding="10">
  <tr>
   <td>№</td>
   <td>Вопрос</td>
   <td>Ответ</td>
</tr>
';
foreach ($DopQuestions as $key=>$question){
    $text='';
    if($question['showText']){
        $text=' ('.$question['text'].' ) ';
    }

    $dataTitle[]=$question["title"];
    $datas[]=$question["Answers"][$question["result"]].$text;

    $html.='
      <tr>
         <td>'.($key+1).'</td>
         <td>'.$question["title"].'</td>
         <td>'.$question["Answers"][$question["result"]].$text.'</td>
      </tr>
    ';
}
$html.='</table>';
//личные вопросы  end **************************************************

$html.='
 <h2>Ответы</h2>
 <table rules="all" style="border-color: #666;" cellpadding="10">
  <tr>
   <td>№</td>
   <td>Вопрос</td>
   <td>Ответ</td>
   <td>Бал</td>
</tr>
';
foreach ($Questions as $key=>$question){
    $dataTitle[]='Question '.($key+1);
    $datas[]=$question["result"];
    $html.='
      <tr>
         <td>'.($key+1).'</td>
         <td>'.$question["title"].'</td>
         <td>'.$question["Answers"][$question["result"]].'</td>
         <td>'.$question["result"].'</td>
      </tr>
    ';
}
$html.='</table>';
$result1=$data['result1'];
$result2=$data['result2'];
$result3=$data['result3'];
$index=$data['index'];
$html.='<p> <strong>Эмоциональное истощение:</strong>'.$result1.' </p>';
$html.='<p> <strong>Деперсонализация:</strong>'.$result2.' </p>';
$html.='<p> <strong>Редукция профессиональных достижений:</strong>'.$result3.' </p>';
$html.='<p> <strong>Индекс синдрома перегорания:</strong>'.$index.' </p>';

// запись в ФАЙЛ start
$file_csv=__DIR__.'/csv/'.date('d_m_Y').'.csv';
if(!file_exists($file_csv)){
    $file = fopen($file_csv, 'a');
    fputcsv($file, $dataTitle);
    fputcsv($file, $datas);
}else{
    $file = fopen($file_csv, 'a');
    fputcsv($file, $datas);
}
fclose($file);
// запись в ФАЙЛ  end

$mail->msgHTML($html);
$mail->AltBody = ' ';

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

