import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { SignupService } from '../services/signup.service';

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.css']
})
export class SigninComponent implements OnInit {

  constructor( public router: Router, public signupService:SignupService) { }

  public email = ''
  public password = ''
  public usersArray:any = [];
  ngOnInit(): void {
   
  }

  signIn (){
    let userObj = {email:this.email, password:this.password};
    this.signupService.loginUser(userObj).subscribe(data =>{
      console.log(data)
      if(data.success==true){
        localStorage['users_jwt'] = data.jwt;
        this.router.navigate(['/dashboard']);
        console.log(data);
      }

    })
  }

    //  this.usersArray = this.contactService.getUsers();
    // let users = this.usersArray.find((user:any)=>user.email == this.email && user.password == this.password)
    // if(users){
    //   localStorage.setItem('contactUser', JSON.stringify(users));
    //   this.router.navigate(['/contact-app'])
    // }else{
    //   this.router.navigate(['/signup'])
    // }

}
