var count = 0;

function setCount(){
  var xhttp = new XMLHttpRequest();

  xhttp.open("GET", "count.php?q=" + count, true);
  xhttp.send();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("count").innerHTML = "Count: " + this.responseText;
          count = +$(this.responseText).text();
      }

  }
}

function addOne(){
  count++;
  document.getElementById('count').innerHTML = "Count: " + count;

  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "count.php?q=" + count, true);
  xmlhttp.send();
}
