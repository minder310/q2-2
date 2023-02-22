// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}
// 網頁執行完成後才啟動此function()
$(document).ready(function(){
	$(".goods").on("click",function(){
		let user=$(this).data("user")
		let news=$(this).data("id")
		console.log(user,news)
		$.post("./api/good_api.php",{user,news},()=>{
			
		})
	})
})