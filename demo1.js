//1.add全局函数给jquery
// jQuery.myAlert=function (str) {
// 	alert(str);
// };
//2.extend method
// jQuery.extend({
// 	myAlert:function(str){
// 		alert(str);
// 	},
// 	myAlert2:function(){
// 		alert(23423423);
// 	}
// });
//3 user command space
// jQuery.zjenny={
// 	myAlert:function(str){
// 		alert(str);
// 	}
// }

$.jenny={
	centerDiv:function(obj){

		obj.css({
			'top': ($(window).height()-div.height())/2,
			'left': ($(window).width()-div.width())/2,
			'position':'absolute'
		});
		return obj;
	}
}