import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';
@Injectable({
  providedIn: 'root'
})
export class SignupService {
public baseUrl = environment.baseUrl
  constructor(public httpClient: HttpClient) { }

  public signupUsers (userObj:any){
    return this.httpClient.post<any>(`${this.baseUrl}/signup.php`,userObj)
  }
  
  public loginUser (userObj:any){
    return this.httpClient.post<any>(`${this.baseUrl}/signin.php`,userObj)
  }

  public dashboard (){
    return this.httpClient.get<any>(`${this.baseUrl}/dashboard.php`)
  }
}
