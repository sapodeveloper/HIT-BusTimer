//時刻表のカウントダウン
function time_count() {
	//現在の時刻を所得
	now_time = new Date();
	
	//所得したデータとバスの時間の差分から残り時間に変換
	a_time1 = Math.floor(((ac_time-now_time)%(24*60*60*1000))/(60*60*1000));// 時
	a_time2 = Math.floor(((ac_time-now_time)%(24*60*60*1000))/(60*1000))%60;// 分
	a_time3 = Math.floor(((ac_time-now_time)%(24*60*60*1000))/1000)%60%60;// 秒
	
	if(week==4){//休日ならば
		document.time_table.table1.value = "運行休止";
	}else if(60*now_time.getHours()+now_time.getMinutes()<start){// 0:00～8:40の間の表示
		document.time_table.table1.value = "始発9:10";
	}else if(end<60*now_time.getHours()+now_time.getMinutes()){// 21:10～0:00の間の表示
		document.time_table.table1.value = "運行終了";
	}else if(0 <= (ac_time - now_time)){//カウントダウン
		if(a_time2<10)a_time2 = "0" + a_time2;//0～9ならば表示を00～09に変更
		if(a_time3<10)a_time3 = "0" + a_time3;
		document.time_table.table1.value = a_time2+":"+a_time3;
	}else{// 発車時刻になったら
		document.time_table.table1.value = "バス発車";
		i = i+1;
		if(i>max){// バスが最終便だったら
			i=0;	
			ac_time.setTime(ac_time.getTime()+24*60*60*1000);
		}
		// 次のバスの時間を取得
		ac_time.setHours(list2[i]/60);
		ac_time.setMinutes(list2[i]%60);
		
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
		
			var m = list2[i+t]%60;// 分
			var h = Math.floor(list2[i+t]/60);
			if(m  < 10)m = "0" + m;// 0～9ならば表示を00～09に変更
			if(h  < 10)h = "0" + h;
			
			// 時刻表の連結
			test += h+":"+m+"\n";
		}
	}
	
	// 表示
	document.time_table.table2.value = test;

}