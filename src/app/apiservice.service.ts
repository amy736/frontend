import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http'
import { Observable } from 'rxjs';
const basebookingUrl = "http://localhost:8080/booking"
const createbookingUrl = "http://localhost:8080/booking/add"
const delbookingUrl = "http://localhost:8080/booking/del"
const putbookingUrl = "http://localhost:8080/booking/put"

@Injectable({
  providedIn: 'root'
})
export class ApiserviceService {
 
  constructor(private _http:HttpClient) { }
//get all 
getAllbooking():Observable<any>{
  const url = "http://localhost:8080/allbooking"
  return this._http.get<any>(url)
}

 // create
 createbooking(booking: any):Observable<any>{
  console.log(booking,'createapi=>');
  return this._http.post(createbookingUrl, booking)
}

//deleting 

deletebooking(id: any): Observable<any> {
  return this._http.delete(`${delbookingUrl}/${id}`);

}

//update 
updatebooking(id: any, booking: any): Observable<any> {
  return this._http.put(`${putbookingUrl}/${id}`, booking);

}

//get one 
getOnebooking(id:any):Observable<any>{
  return this._http.get(`${basebookingUrl}/${id}`);

}
}
