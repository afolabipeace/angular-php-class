import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { Router } from '@angular/router';
import { SignupService } from '../services/signup.service';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {

  constructor(public signupService:SignupService, public formBuilder:FormBuilder, public router: Router, ) { }

  public userForm = this.formBuilder.group({
    full_name: [''],
    phone_no: [''],
    email: [''],
    address: [''],
    password: ['']
})

  public usersArray:any = [];
  public message = '';
  ngOnInit(): void {
  // this.usersArray = this.signupService.getUsers();
  if(localStorage['getUsers']){
    this.usersArray = JSON.parse(localStorage['getUsers']);
  }else{
    this.usersArray = [];
  }
}

  signUp (){
    console.log(this.userForm.value);
    // let full_name = this.userForm.value['full_name']
    // console.log(full_name);
    let userObj = this.userForm.value;
    this.signupService.signupUsers(userObj).subscribe(data =>{
      if(data.success==true){
        this.router.navigate(['/signin']);
      }else{

      }
    })

    // let checkExist = this.usersArray.findIndex((contact:any)=> contact.email == this.userForm.value['email']);
    // console.log(checkExist);
    // if (checkExist == -1) {
    //   this.usersArray.push(this.userForm.value);
    // localStorage.setItem("userDetails",JSON.stringify(this.usersArray));
    // alert('Sigup Successfully')
    // localStorage.setItem("contactUser", JSON.stringify(this.userForm.value));
    // this.router.navigate(['/contact-app']);
    // }else{
    //   this.message = 'This Email has already exist. Please signup '
    // }
    
  }

}
