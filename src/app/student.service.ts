import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class StudentService {
private baseUrl = 'http://localhost/angularphpcode/';
private options = { headers: new HttpHeaders().set('Content-Type', 'application/json') };
  constructor(private http:HttpClient) { }

  getStudentList(): Observable<any> {  
    return this.http.get(`${this.baseUrl}students-list.php`,this.options);  
  } 

  createStudent(student:object):Observable<object>{
    return this.http.post(`${this.baseUrl}save-student.php`,{data:student},this.options);
  }
  deleteStudent(id: number): Observable<any> {  
    return this.http.delete(`${this.baseUrl}delete-student.php?id=${id}`,this.options);  
  }  
  
  getStudent(id: number): Observable<Object> {  
    return this.http.get(`${this.baseUrl}show-student.php?id=${id}`,this.options);  
  }  
  
  updateStudent(id: number, value: object): Observable<Object> {  
    return this.http.post(`${this.baseUrl}update-student.php`, {data:value},this.options);  
  }  
}
