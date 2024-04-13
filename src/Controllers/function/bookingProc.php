<?php 
//get all BOOKING
function getAllbooking($db) {

    
    $sql = 'Select * FROM booking'; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get BOOKING by id
function getbooking($db, $id) {

    $sql = 'Select o.customer_name, o.checkin_date, o.checkout_date, o.room_type, o.numb_guests, o.status_booking, o.info_id FROM booking o  ';
    $sql .= 'Where o.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $id;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new BOOKING
function createbooking($db, $form_data) { 
    $sql = 'INSERT INTO booking ( customer_name, checkin_date, checkout_date, room_type, numb_guests, status_booking, info_id)'; 
    $sql .= ' VALUES ( :customer_name, :checkin_date, :checkout_date, :room_type, :numb_guests, :status_booking, :info_id)';  
    $stmt = $db->prepare($sql); 
    $stmt->bindParam(':customer_name', $form_data['customer_name']);
    $stmt->bindParam(':checkin_date', $form_data['checkin_date']);
    $stmt->bindParam(':checkout_date', $form_data['checkout_date']);
    $stmt->bindParam(':room_type', $form_data['room_type']);
    $stmt->bindParam(':numb_guests', $form_data['numb_guests']);
    $stmt->bindParam(':status_booking', $form_data['status_booking']);
    $stmt->bindParam(':info_id', $form_data['info_id'], PDO::PARAM_INT);
    $stmt->execute(); 
    return $db->lastInsertID();
}



//delete BOOKING by id
function deletebooking($db,$id) { 

    $sql = ' Delete from booking where id = :id';
    $stmt = $db->prepare($sql);  
    $id = (int)$id; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update BOOKING by id
function updatebooking($db,$form_dat,$id) { 

    
    $sql = 'UPDATE booking SET customer_name = :customer_name , checkin_date = :checkin_date , checkout_date = :checkout_date , room_type = :room_type, numb_guests = :numb_guests, status_booking = :status_booking, info_id = :info_id'; 
    $sql .=' WHERE   id = :id'; 
    $stmt = $db->prepare ($sql); 
    $id = (int)$id;  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':customer_name', ($form_dat['customer_name']));
    $stmt->bindParam(':checkin_date', ($form_dat['checkin_date']));
    $stmt->bindParam(':checkout_date', ($form_dat['checkout_date']));
    $stmt->bindParam(':room_type', ($form_dat['room_type']));
    $stmt->bindParam(':numb_guests', ($form_dat['numb_guests']));
    $stmt->bindParam(':status_booking', ($form_dat['status_booking']));
    $stmt->bindParam(':info_id', ($form_data['info_id']), PDO::PARAM_INT);
    $stmt->execute(); 
}
//INFO
//get all INFO
function getAllinfo($db) {

    
    $sql = 'Select * FROM info'; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 
//get INFO by id
function getinfo($db, $info_id) {
    $sql = 'SELECT info_id, customer_name, customer_email, customer_phone FROM info WHERE info_id = :info_id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':info_id', $info_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch() instead of fetchAll()
}


//add new INFO CUSTOMER
function createinfo($db, $form_data) { 
    $sql = 'Insert into info (customer_name, customer_email, customer_phone )'; 
    $sql .= 'values (:customer_name, :customer_email, :customer_phone)';  
    $stmt = $db->prepare ($sql); 
    $stmt->bindParam(':customer_name', ($form_data['customer_name']));
    $stmt->bindParam(':customer_email', ($form_data['customer_email']));
    $stmt->bindParam(':customer_phone', ($form_data['customer_phone']));
    $stmt->execute(); 
    return $db->lastInsertID();
}