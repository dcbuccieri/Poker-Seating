function getList() {
    var posting = $.post("getlist.php");
    posting.done(function(data){
        $("#lists").empty().html(data);
        var windowOR = window.open("remote.php", "remote");
    });
}
function getFront() {
    var posting = $.post("getFront.php");
    posting.done(function(data){
        $("#lists").empty().html(data);
    });
}
function addGame() {
    var str = document.getElementById("gameName").value;
    var posting = $.post("addgame.php", {game: str} );
    posting.done(function(data){
        $("#gameName").val('');
        getList();
    });
}

function addName(g) {
    var str = document.getElementById(g).value;
    var posting = $.post("addtolist.php", {name: str, game: g} );
    posting.done(function(data){
        $("#playerName").val('');
        getList();
    });
    
}
function removeName(str, g) {
    var posting = $.post("remove.php", {id: str, game: g} );
    posting.done(function(data){
        $("#playerName").val('');
        getList();
    });
    
}
function removeGame() {
    var str = document.getElementById("remove").value;
    var posting = $.post("removegame.php", {game: str});
    posting.done(function(data){
        getList();
    });
    
}
function moveName(id, g, d) {
    var posting = $.post("move.php", {id: id, game: g, d: d} );
    posting.done(function(data){
        getList();
    });
    
}
