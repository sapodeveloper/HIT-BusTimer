<?php
	// 文字コード指定
	header("Content-Type: text/html; charset=UTF-8");
	
	// DOMライブラリ読み込み
    	require_once 'simple_html_dom.php';
	
	// 今日の年月を取得
	$today = date('n月');
	
	// 広島工業大学のバス予定表読み込み
	$dom = file_get_html('http://www.jim.it-hiroshima.ac.jp/bus/bus.asp');
	
	// 左側の予定表の年月読み込み
	$left_month = $dom->find('table', 3)->find('td', 0);
	
	// 右側の予定表の年月読み込み
	$right_month = $dom->find('table', 4)->find('td', 0);
	
	// 読み込んだ年月の文字エンコード
	$left_month 	= mb_convert_encoding($left_month, "UTF-8", "auto");
	$right_month 	= mb_convert_encoding($right_month, "UTF-8", "auto");
	$today 			= mb_convert_encoding($today, "UTF-8", "auto");
	
	// 読み込んだ年月から月を抽出
	preg_match('/1月|2月|3月|4月|5月|6月|7月|8月|9月|10月|11月|12月/', $today, $matches);
	preg_match('/1-12/', $matches[0], $today);
	
	preg_match('/1月|2月|3月|4月|5月|6月|7月|8月|9月|10月|11月|12月/', $left_month, $matches);
	preg_match('/1-12/', $matches[0], $left_month);
	
	preg_match('/1月|2月|3月|4月|5月|6月|7月|8月|9月|10月|11月|12月/', $right_month, $matches);
	preg_match('/1-12/', $matches[0], $right_month);

	//運行状態の○×△を格納する配列
	$state = array();
	//運行状態の○×△を格納する処理で使用する変数
	$cnt = 7;
	//運行状態を決定する変数
	$s = 1;

	//今日の月と等しい予定表の○×△を配列に格納
	if ($today == $left_month) {
		for ($i=0; $i<31; $i++) {
			if ($dom->find('table', 3)->find('td', $cnt) == true) {
				$state[$i] = $dom->find('table', 3)->find('td', $cnt);
				//○×△を格納した配列からタグを取り除く
				preg_match('/○|×|△/', $state[$i], $matches);
				$state[$i] = $matches[0];
			}
			$cnt = $cnt + 4;
		}
	} elseif ($today == $right_month) {
		for ($i=0; $i<31; $i++) {
			if ($dom->find('table', 4)->find('td', $cnt) == true) {
				$state[$i] = $dom->find('table', 4)->find('td', $cnt);
				//○×△を格納した配列からタグを取り除く
				preg_match('/○|×|△/', $state[$i], $matches);
				$state[$i] = $matches[0];
			}
			$cnt = $cnt + 4;
		}
	}

	//今日の日付と配列を比較し、○であれば1、△であれば2、×であれば4を$sに格納する
	$day = date('j');
	for ($i=0; $i<count($state); $i++) {
		if ($day == $i + 1) {
			if ($state[$i] === "○") {
				$s = 1;
				break;
			} else if ($state[$i] === "△") {
				$s = 2;
				break;
			} else {
				$s = 4;
				break;
			}
		}
	}
	
	//echo $s;
?>