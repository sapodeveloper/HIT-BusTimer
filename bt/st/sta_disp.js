// 時刻表のカウントダウン
function time_count() {
	// 現在の時刻を所得
	now_time = new Date();
	
	// 所得したデータとバスの時間の差分から残り時間に変換
	s_time1 = Math.floor(((sta_time-now_time)%(24*60*60*1000))/(60*60*1000));
	s_time2 = Math.floor(((sta_time-now_time)%(24*60*60*1000))/(60*1000))%60;
	s_time3 = Math.floor(((sta_time-now_time)%(24*60*60*1000))/1000)%60%60;

	if(week==4){// 休日ならば
		document.time_table.table1.value = "運行休止";
	}else if(60*now_time.getHours()+now_time.getMinutes()<start){
		document.time_table.table1.value = "始発7:59";
	}else if(end<60*now_time.getHours()+now_time.getMinutes()){
		document.time_table.table1.value = "運行終了";
	}else if((sta_time - now_time) > 0){// カウントダウン
		if(s_time2<10)s_time2 = "0" + s_time2;// 0～9ならば表示を00～09に変更
		if(s_time3<10)s_time3 = "0" + s_time3;
		document.time_table.table1.value = s_time2+":"+s_time3;
	}else{// 発車時刻になったら
		document.time_table.table1.value = "バス発車";
		i = i+1;
		if(i>max){
			i=0;
			sta_time.setTime(sta_time.getTime()+24*60*60*1000);
		}
		// 次のバスの時間を取得
		sta_time.setHours(list1[i]/60);
		sta_time.setMinutes(list1[i]%60);
		
		// 時刻表の更新
		time_table();
	}
	// 1秒間隔でカウントダウンを実行
	setTimeout('time_count()', 1000);
}

// 時刻表の更新
function time_table() {
	// 表示文字列初期化
	var test = "";
	if(week==4){
		test = "";
	}
	else{
		// 最新3件を表示
		for(var t=0;i+t<=max&&t<4;t++){
	
			var m = list1[i+t]%60;// 分
			var h = Math.floor(list1[i+t]/60);
			if(m  < 10)m = "0" + m;// 0～9ならば表示を00～09に変更
			if(h  < 10)h = "0" + h;
			
			// 時刻表の連結
			test += h+":"+m+"\n";
		}
	}
	// 表示
	document.time_table.table2.value = test;
}