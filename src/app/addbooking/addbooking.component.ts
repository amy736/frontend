import { Component, OnInit } from '@angular/core';
import {FormControl, FormGroup, Validators} from '@angular/forms';
import {ApiserviceService} from '../apiservice.service';
import { ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-addbooking',
  templateUrl: './addbooking.component.html',
  styleUrls: ['./addbooking.component.css']
})
export class AddbookingComponent implements OnInit {

  constructor(private service:ApiserviceService,  private router:ActivatedRoute) { }

  errormsg:any;
  successmsg:any;
  getparamid:any;

  ngOnInit(): void {
    //id for update
    this.getparamid = this.router.snapshot.paramMap.get('id');
    if (this.getparamid){
    this.service.getOnebooking(this.getparamid).subscribe((res)=>{

      console.log(res,'res==>');
      this.bookingForm.patchValue({
        customer_name:res.data[0].customer_name,
        checkin_date:res.data[0].checkin_date,
        checkout_date:res.data[0].checkout_date,
        room_type:res.data[0].room_type,
        numb_guests:res.data[0].numb_guests,
        status_booking:res.data[0].status_booking,
      });
    });
  }
  }

  bookingForm = new FormGroup({
    'customer_name':new FormControl('',Validators.required),
    'checkin_date':new FormControl('',Validators.required),
    'check_out':new FormControl('',Validators.required),
    'room_type':new FormControl('',Validators.required),
    'numb_guests':new FormControl('',Validators.required),
    'status_booking':new FormControl('',Validators.required),
  });

  //to create a new customer
  bookingSubmit(){
    if(this.bookingForm.valid){
      console.log(this.bookingForm.value);
      this.service.createbooking( this.bookingForm.value ).subscribe((res)=>{
        console.log(res,'res==>');
        this.bookingForm.reset();
        this.successmsg = 'Add Customer Profile Successful';
      });

    }
    else{
      this.errormsg = 'Add Customer Profile Unsuccessful';
    }

  }
//to update a customer
bookingUpdate()
{
  console.log(this.bookingForm.value,'updatedform');

  if(this.bookingForm.valid)
  {
    this.service.updatebooking(this.bookingForm.value,this.getparamid).subscribe((res)=>{
      console.log(res,'resupdated');
      this.successmsg = res.message;

    })
  }
  else
  {
    this.errormsg = 'invalid';
  }
}
}
