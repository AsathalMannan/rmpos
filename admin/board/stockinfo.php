<?php
$username="root";
$password="pass123";
$database="stock";
$conn = mysqli_connect("localhost", $username, $password, $database);

//total
$q_numitems = "SELECT count(pno) as num_items from stocktb";
$row_numitems = $conn->query($q_numitems);
$f_numitems = mysqli_fetch_assoc($row_numitems);
$numitems=$f_numitems["num_items"];
//scratch guard
$q_scratch = "SELECT count(pno) as scratch from stocktb where category='Scratch Guard'";
$row_scratch = $conn->query($q_scratch);
$f_scratch = mysqli_fetch_assoc($row_scratch);
$scratch=$f_scratch["scratch"];
//back case
$q_back = "SELECT count(pno) as back from stocktb where category='Back Case'";
$row_back = $conn->query($q_back);
$f_back = mysqli_fetch_assoc($row_back);
$back=$f_back["back"];
//flip case
$q_flip = "SELECT count(pno) as flip from stocktb where category='Flip Case'";
$row_flip = $conn->query($q_flip);
$f_flip = mysqli_fetch_assoc($row_flip);
$flip=$f_flip["flip"];
//memory card
$q_memory = "SELECT count(pno) as memory from stocktb where category='Memory Card'";
$row_memory = $conn->query($q_memory);
$f_memory = mysqli_fetch_assoc($row_memory);
$memory=$f_memory["memory"];
//pendrive
$q_pendrive = "SELECT count(pno) as pendrive from stocktb where category='Pendrive'";
$row_pendrive = $conn->query($q_pendrive);
$f_pendrive = mysqli_fetch_assoc($row_pendrive);
$pendrive=$f_pendrive["pendrive"];
//power
$q_power = "SELECT count(pno) as power from stocktb where category='Power Bank'";
$row_power = $conn->query($q_power);
$f_power = mysqli_fetch_assoc($row_power);
$power=$f_power["power"];
//charger
$q_charger = "SELECT count(pno) as charger from stocktb where category='Charger'";
$row_charger = $conn->query($q_charger);
$f_charger = mysqli_fetch_assoc($row_charger);
$charger=$f_charger["charger"];
//mobile
$q_mobile = "SELECT count(pno) as mobile from stocktb where category='Mobile Phone'";
$row_mobile = $conn->query($q_mobile);
$f_mobile = mysqli_fetch_assoc($row_mobile);
$mobile=$f_mobile["mobile"];
//card reader
$q_cardreader = "SELECT count(pno) as cardreader from stocktb where category='Card Reader'";
$row_cardreader = $conn->query($q_cardreader);
$f_cardreader = mysqli_fetch_assoc($row_cardreader);
$cardreader=$f_cardreader["cardreader"];
//headphones
$q_headphones = "SELECT count(pno) as headphones from stocktb where category='Headset'";
$row_headphones = $conn->query($q_headphones);
$f_headphones = mysqli_fetch_assoc($row_headphones);
$headphones=$f_headphones["headphones"];
//battery
$q_battery = "SELECT count(pno) as battery from stocktb where category='Battery'";
$row_battery = $conn->query($q_battery);
$f_battery = mysqli_fetch_assoc($row_battery);
$battery=$f_battery["battery"];
//data cables
$q_datacables = "SELECT count(pno) as datacables from stocktb where category='Data Cables'";
$row_datacables = $conn->query($q_datacables);
$f_datacables = mysqli_fetch_assoc($row_datacables);
$datacables=$f_datacables["datacables"];
//mobile panels
$q_mobilepanels = "SELECT count(pno) as mobilepanels from stocktb where category='Mobile Panels'";
$row_mobilepanels = $conn->query($q_mobilepanels);
$f_mobilepanels = mysqli_fetch_assoc($row_mobilepanels);
$mobilepanels=$f_mobilepanels["mobilepanels"];
//speakers
$q_speakers = "SELECT count(pno) as speakers from stocktb where category='Speakers'";
$row_speakers = $conn->query($q_speakers);
$f_speakers = mysqli_fetch_assoc($row_speakers);
$speakers=$f_speakers["speakers"];
//tampered
$q_tampered = "SELECT count(pno) as tampered from stocktb where category='Tampered glass'";
$row_tampered = $conn->query($q_tampered);
$f_tampered = mysqli_fetch_assoc($row_tampered);
$tampered=$f_tampered["tampered"];
?>