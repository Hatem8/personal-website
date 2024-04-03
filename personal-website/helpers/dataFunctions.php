<?php 
//function btread el data mn el file w t7wlha mn json l array
function readData($url)
{
    // get file content from json file
    $content = file_get_contents($url); // string json
    // from json to array 
    return json_decode($content, true);
}
//function bta5od array 3lshan t7ot el data el feh fe file el json
function writeData($url,$data)
{
    //from array to json
    $dataToJson = json_encode($data);
    //put array content into json file
    file_put_contents($url,$dataToJson);
}
//function bst5dmha 3lshan azwd object mn el contact us
function writeContactUs($contactM){
    $data = readData('./../data/contactUsData.json');
    $lastData = $data ? end($data) : []; // readable
    $lastDataId = $lastData['id'] ?? 0;
    $newData = [
        'id' => $lastDataId+1,
        'name' => $contactM[0],
        'email' => $contactM[1],
        'phone'=> $contactM[2],
        'message'=> $contactM[3],

    ];
    $data[]= $newData;
    writeData('./../data/contactUsData.json',$data);
}
//function bst5dmha 3lshan a3ml delete le contact us
function deleteContact($id){
    $contactUsData = readData('./../data/contactUsData.json');
    $newContactUsData = [];
    foreach ($contactUsData as $contact) {
        if ($contact['id'] != $id) {
            $newContactUsData[] = $contact;
        }
    }
    writeData('./../data/contactUsData.json',$newContactUsData);
}

//function 3lshan azwd project
function createProject($nProject){
    $data = readData('./../data/projectsData.json');
    $lastData = $data ? end($data) : []; 
    $lastProjectId = $lastData['id'] ?? 0;
    $newProject = [
        'id' => $lastProjectId +1,
        'name' => $nProject[0],
        'desc' => $nProject[1],
        'dest' => $nProject[2],
    ];
    $data[]= $newProject;
    writeData('./../data/projectsData.json',$data);
}
//function 3lshan a3dl fe project mo3yn
function updateProject($editedProject){
    $data = readData('./../data/projectsData.json');
    $newEditedProject=[
            'id' => $editedProject[0],
            'name' => $editedProject[1],
            'desc' => $editedProject[2],
            'dest' => $editedProject[3],
        
        ];
    $newProjectsData=[];
    foreach ($data as $project) {
        if($project['id'] == $newEditedProject['id']) {
            $newProjectsData[] = $newEditedProject;
        }
        else{
            $newProjectsData[] = $project;
        }
    }
    writeData('./../data/projectsData.json',$newProjectsData);

}
//function 3lshan a3ml delete le project 
function deleteProject($id){
    $data = readData('./../data/projectsData.json');
    $newProjectsData=[];
    foreach ($data as $project) {
        if ($project['id'] != $id) {
            $newProjectsData[] = $project;
        }
    }
    writeData('./../data/projectsData.json',$newProjectsData);
}


?>