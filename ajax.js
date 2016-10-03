function ajax( method,url,data,success){
	var xhr = null ; 
    //1.构造对象
    
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}else{
	    xhr = new ActiveXObject('Microsoft.XMLHTTP') // 对IE6的支持
	}
	/* 另外一种写法
	try{xhr = new XMLHttpRequest();}
	catch(e){xhr = new ActiveXObject('Microsoft.XMLHTTP')}
	 */
	
	//2.open方法
	if(method == 'get'){
		url += '?' + data + '&' + new Date().getTime();
	}
	xhr.open(method, url , true);
	//3.send方法
	if( method == 'get')
	{xhr.send();}else{
		xhr.setRequestHeader('content-type','application/x-www-form-urlencode')
		xhr.send(data);
	}
	
	//4返回信息
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4){
			if( xhr.status == 200){
				success(xhr.responseText);
			}else{
				alert("出错啦，error:" + xhr.status);
			}
			
		}
	};
}



