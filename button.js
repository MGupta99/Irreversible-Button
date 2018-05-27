var count = 0;

$(document).ready(function() {

  // Retrieves count from databse
  $.post('count.php', {value:count}, function(new_count){
    // Changes count on webpage
    $('.count').html("Count: " + new_count);
    // Changes script count value
    count = parseInt(new_count);
  })

  // Changes visible count and updates database
  $('.add').click(function () {
    // Increments count
    count++;
    // Changes count on webpage
    $('.count').html("Count: " + count);
    // Sends count to server
    $.post('count.php', {value:count});
  })
})
