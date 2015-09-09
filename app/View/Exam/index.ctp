
<script>

$(document).ready(function() {

	$.post('question/getChapterQuestions/2',function(data) {

		console.log(data);

	});

});

</script>