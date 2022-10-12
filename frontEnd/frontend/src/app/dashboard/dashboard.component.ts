import { Component, OnInit } from '@angular/core';
import { SignupService } from '../services/signup.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  constructor(public signupService: SignupService) { }

  ngOnInit(): void {
    this.signupService.dashboard().subscribe(data => {
      console.log(data);
    })
  }

}
