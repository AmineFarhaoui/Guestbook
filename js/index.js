fetchComments();

function postName() {
    //e.preventDefault();

    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;


    
    var params = "firstname="+firstname + "&lastname="+lastname + "&email="+email + "&message="+message;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'inc/comment.inc.php?'+params, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        //console.log(this.responseText);

        var output = JSON.parse(this.responseText).status;

        var errormsg = "";
        
        
        if (output == 'OK') {
            errormsg += 
                '<div class="flex p-4 bg-green-600 bg-opacity-10 border-2 border-green-600">' +
                    '<h1 class="text-green-600">Your comment has been succesfully submitted!</h1>' +
                '</div>'
            ;
            document.getElementById('data').innerHTML = errormsg;
        } else if(output == 'EMPTY') {
            errormsg += 
                '<div class="flex p-4 bg-red-600 bg-opacity-10 border-2 border-red-600">' +
                    '<h1 class="text-red-600">Please fill in all fields!</h1>' +
                '</div>'
            ;
            document.getElementById('data').innerHTML = errormsg;
        }
        else if (output == 'ERROR') {
            errormsg += 
            '<div class="flex p-4 bg-red-600 bg-opacity-10 border-2 border-red-600">' +
                '<h1 class="text-red-600">Something went wrong :(</h1>' +
            '</div>'
        ;
            document.getElementById('data').innerHTML = errormsg;
        }
        else if (output == 'invalidEmail') {
            errormsg += 
            '<div class="flex p-4 bg-red-600 bg-opacity-10 border-2 border-red-600">' +
                '<h1 class="text-red-600">Email is not valid! :(</h1>' +
            '</div>'
        ;
            document.getElementById('data').innerHTML = errormsg;
        }
        fetchComments();
    }

    xhr.send(params);

    //fetchComments();
}


function fetchComments() {
    //e.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'inc/fetchComments.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        //console.log(this.responseText);
        if (this.status == 200) {

            var comments = JSON.parse(this.responseText);

            var comment = "";
            
            if (comments == 'ERROR') {
                document.getElementById('commentSection').innerHTML = 'Something went wrong fetching! Reload the page :(';
            }
            else {
                for (var i in comments) {
                    comment += 
                        '<div class="rounded p-2">' + 
                            '<div class="flex">' +
                                '<h3 class="font-bold">' + comments[i].fisrstName + '&nbsp' + comments[i].lastName + '&nbsp' + '</h3>' + 
                                '<h3 class="font-bold text-white text-opacity-50">' + ' - ' + comments[i].emailAddress + '</h3>' +
                            '</div>' +
                            '<div>' +
                                '<p>' + comments[i].message + '</p>' +
                            '</div>' +
                            '<div>' +
                                '<p class="text-xs text-white text-opacity-40">' + comments[i].created_at  + '</p>' +
                            '</div>' +
                        '</div>'
                    ;
                }
    
                document.getElementById('commentSection').innerHTML = comment;
            }

        }
    }

    xhr.send();
}