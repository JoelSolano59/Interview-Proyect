<?php
    //Connect to the database
    $conn = mysql_connect("username","password","") or die('Could not connect: ' . mysql_error());
    mysql_select_db("fake_table", $conn);

    //Read JSON file
    $json = file_get_contents('FakeSample.json');

    //Convert JSON to PHP array
    $data = json_decode($json, true);

    //Get JSON data into variables
    $sn = $data['SampleNumber'];
    $pv = $data['PipelineVersion'];
    $sq = $data['Sequencer'];
    $kbv = $data['KnowledgebaseVersion'];
    $dg = $data['DateGenerated'];
    $gn = $data['CurrentMedications']['Drugs']['Generic'];
    $tr = $data['CurrentMedications']['Drugs']['Trade'];
    $ta = $data['CurrentMedications']['TheraputicArea'];
    $ge1 = $data['CurrentMedications']['GeneInfo']['Gene'];
    $gt1 = $data['CurrentMedications']['GeneInfo']['Genotype'];
    $pt1 = $data['CurrentMedications']['GeneInfo']['Phenotype'];
    $ge2 = $data['CurrentMedications']['GeneInfo']['Gene'];
    $gt2 = $data['CurrentMedications']['GeneInfo']['Genotype'];
    $pt2 = $data['CurrentMedications']['GeneInfo']['Phenotype'];
    $gp = $data['CurrentMedications']['GroupPhenotype'];
    $ac = $data['CurrentMedications']['Action'];
    $rc = $data['CurrentMedications']['Recommendation'];

    //Insert variables into MySQL table
    $sql = "INSERT INTO fake_table
    VALUES('$sn', '$pv', '$sq', '$kbv', '$dg', '$gn', '$tr', '$ta', '$ge1', '$gt1', '$pt1', '$ge2', '$gt2', '$pt2', '$gp', '$ac', '$rc')";
    if(!mysql_query($sql,$conn)){die('Error : ' . mysql_error());}
?>