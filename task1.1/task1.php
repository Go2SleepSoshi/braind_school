<?php
#функция, которая обрезает текст $text до 200 символов, заменяет три последних слова на ссылку $link и прибавляет троеточие
function art_prev($text, $link)
{
	$resText = mb_substr($text, 0, 200); #текст обрезавется до 200 символов, если в тексте их больше двухсот
	$temp = explode(" ", $resText); #разбивается на слова по пробелам
	
	#проверка на количество слов в тексте (больше или меньше трех)
	if (count($temp) > 3) 
		{
			$temp = array_splice($temp, -3); #заполняем массив тремя последними словами из массива слов текста
			$resLink = implode(" ", $temp); #объединяем массив в строку для текста ссылки
			$resText = mb_substr($resText, 0, mb_strlen($resText) - mb_strlen($resLink)); #обрезаем текст из 200 символов на длину трех последних слов, чтобы можно было вставить ссылку в конце
			#заполняем результат функции строкой с текстом $articleText и ссылкой $articleLink
			$result = "<span>"
							 . $resText . " " . "<a href=" . $link . ">" . $resLink . "...</a>
						</span>";
		}
		else 
		{
			$resText = implode(" ", $temp); #если меньше трех слов в тексте, объединяем в одну строку для ссылки
			#заполняем результат функции строкой с текстом $articleText и ссылкой $articleLink
			$result = "<span>
							<a href=" . $link . ">" . $resText . "...</a>
					  	</span>";
		}
	
	return $result;
}

$articleText = "Раз два три четыре пять шесть семь восемь девять десять одиннадцать двенадцать тринадцать";	#строка с текстом
$articleLink = "https://google.com"; #строка с ссылкой
$articlePreview = art_prev($articleText, $articleLink); #строка с превью
echo $articlePreview;
?>