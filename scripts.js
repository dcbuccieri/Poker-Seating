   
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
    var str = document.getElementById("removelist").value;
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

function banIP(ip, n) {
    var a = document.getElementById("bannames");
    var ip = a.options[a.selectedIndex].value;
    var n = a.options[a.selectedIndex].text;
    var posting = $.post("ban.php", {ip: ip, name: n} );
    posting.done(function(data){
        getList();
    });    
}

function unbanIP(ip) {
    var posting = $.post("unban.php", {ip: ip} );
    posting.done(function(data){
        getList();
    });    
}

function getTourneys() {
    var posting = $.post("getTourneys.php");
    posting.done(function(data){
        $("#today").empty().html(data);
    });   
}

function updateTourneys() {
    var posting = $.post("updateTourneys.php");
    posting.done(function(data){
        $("#today").empty().html(data);
    });
}

function updateTables(t) {
    var a = document.getElementById(t+"tables").value;
    var posting = $.post("updateTables.php", {game: t, tables: a});
    posting.done(function(data){
        $("#"+t+"mixtables").empty().html(data);
        getList();
    });
}
function updateMarquee() {
    var a = document.getElementById("markietext").value;
    var posting = $.post("updateMarquee.php", {text: a});
    posting.done(function(data){
        $("#markietext").empty().html(data);
        getList();
    });
}
