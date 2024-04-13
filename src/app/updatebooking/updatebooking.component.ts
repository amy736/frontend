import { Component, OnInit} from '@angular/core';
import {FormControl, FormGroup, Validators} from '@angular/forms';
import {ApiserviceService} from '../apiservice.service';
import { ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-updatebooking',
  templateUrl: './updatebooking.component.html',
  styleUrls: ['./updatebooking.component.css']
})

export class UpdatebookingComponent implements OnInit {

  infoForm = new FormGroup({
    'customer_name':new FormControl('',Validators.required),
    'customer_email':new FormControl('',Validators.required),
    'customer_phone':new FormControl('',Validators.required),
  });

  constructor(private service:ApiserviceService,  private router:ActivatedRoute) { }

  errormsg:any;
  successmsg:any;
  getparamid:any;
  message: boolean= false;

  ngOnInit(): void {

      this.service.getOnebooking(this.router.snapshot.params['id']).subscribe((res:any)=>{
        console.log(res,'res==>');
        this.infoForm.patchValue({
          customer_name:res.data[0].customer_name,
          customer_email:res.data[0].customer_email,
          customer_phone:res.data[0].customer_phone,

        });
      });
  }
//to update a customer
infoUpdate()
{
  console.log(this.infoForm.value);
    this.service.updatebooking(this.router.snapshot.params['id'], this.infoForm.value).subscribe((result:any)=>{

    this.infoForm.reset();
    this.successmsg = 'Profile successfully updated';
    this.message = true;

    });
  }
removeMessage(){
  this.message = false;
}
}