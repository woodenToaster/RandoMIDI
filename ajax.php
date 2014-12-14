

<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'Taylor':
            play();
            break;
    }
}

function play(){
    require('midi_class_v178/classes/midi.class.php');
    $midi = new Midi();
    $midi->playMidFile('taylor_swift-shake_it_off.mid',0,1,0,'quicktime');
}
?>