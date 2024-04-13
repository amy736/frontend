import { Component, OnInit } from '@angular/core';
import {ApiserviceService}from '../apiservice.service';

@Component({
  selector: 'app-viewbooking',
  templateUrl: './viewbooking.component.html',
  styleUrls: ['./viewbooking.component.css']
})
export class ViewbookingComponent implements OnInit {

  constructor(private service:ApiserviceService) { }


  listData:any;
  successmsg:any;


ngOnInit(): void {
  this.getAllbooking();


  }

  //get delete id
  deleteId(id:any){
    console.log(id,'deleteid==>');
    this.service.deletebooking(id).subscribe((res)=>{
      console.log(res,'deleteres==>');
      this.successmsg = "Delete booking profile successful!";
      this.getAllbooking();

    });

  }

  //get customer
  getAllbooking(){

    this.service.getAllbooking().subscribe((res)=>{
      console.log(res,"res==>");

      this.listData = res.data;
    });

  }

}
