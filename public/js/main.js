const actions = document.getElementById('actions');
const count = document.getElementById('exercisesCount');
var loop = document.getElementById('loop');

if(count)
{
    document.getElementById('exercisesCount').innerHTML = "";
}

if(loop)
{
    document.getElementById('loop').innerHTML = "";
}


if(actions && count && loop) {
    actions.addEventListener('click', e=> {
        if(e.target.className === 'btn btn-success similar') {
            if(confirm('check')) {
                document.getElementById('0').innerHTML = "<tr> <td> dupa </td> <form method='POST' id='form' action='/login/{}'><td><div class='row'><div class='col-md-5'><input type='number' class='form-control' name='weight' min='1' max='600' placeholder='0' id='weight' /></div> </div></td><td><div class='row'><div class='col-md-5'><input type='number' class='form-control' name='sets' min='1' max='30' placeholder='0' id='sets' /></div> </div></td><td><div class='row'><div class='col-md-5'><input type='number' class='form-control' name='reps' min='1' max='600' placeholder='0' id='reps' /></div> </div></td><td> <input type='hidden' name='exercise' id='exercise' value='#'/><input type='submit' class='btn btn-success' value='Setup'/></td></form></tr>"; 
            }
        }
    })
}