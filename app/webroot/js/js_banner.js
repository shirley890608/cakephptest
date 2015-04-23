$(function(){
	(function(){
		var curr = 0;
		$("#banner img").each(function(i){
			$(this).click(function(){
				curr = i;
				$("#banner img").eq(i).fadeIn("slow").siblings("img").hide();
				return false;
			});
		});
		
		var pg = function(flag){
			if (flag) {
				if (curr == 0) {
					todo = 1;
				} else {
					todo = (curr - 1) % 5;
				}
			} else {
				todo = (curr + 1) % 5;
			}
		};
		
		var timer = setInterval(function(){
			todo = (curr + 1) % 5;
			$("#banner img").eq(todo).click();
		},4000);
		
	})();
});