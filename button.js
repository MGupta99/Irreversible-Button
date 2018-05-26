var count = 0;

$(document).ready(function() {

  // Retrieves count from database and sets it equal to count
  $.post('count.php', {value:count}, function(new_count){
    $('.count').html("Count: " + new_count);
    count = parseInt(new_count);
  })

  // Changes visible count and updates database
  $('.add').click(function () {
    count++;
    $('.count').html("Count: " + count);
    $.post('count.php', {value:count});
  })
})
