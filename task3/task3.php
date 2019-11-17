<?php 
#функция сортирует массив длиной $quantity в лексикографическом порядке и возвращает номер числа $number в массиве
function num_search($quantity, $number)
{
	$arr_num = range(1, $quantity); #заполняем массив числами от 1 до $quantity
	sort($arr_num, SORT_STRING); #сортируем массив как массив строк
	echo "Отсортированный массив: <br>" . implode(" ", $arr_num) . "<br>";

	#проходим циклом по массиву в поисках элемента $number
	for ($i=0; $i < $quantity; $i++) 
	{ 
		#как только элемент $number найден, завершаем работу функции и возвращаем индекс элемента $i плюс один
		if ($arr_num[$i] == $number)
		{
			return $i + 1;
		}
	}
}

#присваиваем значения переменным из глобального массива POST
$num_q = $_POST['quantity'];
$num_n = $_POST['number'];

#проверяем что элемент находится в массиве
if ($num_n <= $num_q)
{
	echo "Позиция числа \"" . $num_n . "\": " . num_search($num_q, $num_n);
}
else
{
	echo "Такого числа нет в массиве";
}
?>