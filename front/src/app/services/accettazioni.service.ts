import { Injectable, signal } from '@angular/core';
import { Accettazione } from './accettazione-interface';
import { HttpClient } from '@angular/common/http';

@Injectable({  providedIn: 'root'})
export class AccettazioniService {
  accettazioni_p :Accettazione[] =[
    {
      id_accettazione: 130, 
      nome: 'Aldo', 
      cognome: 'Rossi', 
      data_accettazione: '16-82-2014',
      id_ricetta: 1947, data_fruizione: '18-37-1947', id_flusso_di_registrazione: 38573,
      tipologia_accettazione: 'indiretta',
      id_utente: 0,
      id_struttura: 0,
      id_reparto: 0,
      id_operatore: 0,
      descrizione_accettazione: ''
    },
    {
      id_accettazione: 160, 
      nome: 'Carlo', 
      cognome: 'Verdi', 
      data_accettazione: '27-47-1048',
      data_fruizione: '16-48-2837', id_flusso_di_registrazione: 29485,
      tipologia_accettazione: 'diretta',
      id_utente: 0,
      id_struttura: 0,
      id_reparto: 0,
      id_operatore: 0,
      descrizione_accettazione: ''
    },
    {
      id_accettazione: 283, 
      nome: 'Gianni', 
      cognome: 'Gialli', 
      data_accettazione: '17-48-1038',
      id_ricetta: 1850, data_fruizione: '16-38-1948', id_flusso_di_registrazione: 392,
      tipologia_accettazione: 'indiretta',
      id_utente: 0,
      id_struttura: 0,
      id_reparto: 0,
      id_operatore: 0,
      descrizione_accettazione: ''
    },
  ]
  
  accettazioni =signal<Accettazione[]>([])
  private url=''
  constructor(private http:HttpClient){}

  getAccettazione(){
    this.http.get(this.url).subscribe(res=>{
      console.log('get', res);
    })
  }
  deleteAccettazione(id_accettazione:number){
    this.http.delete(`${this.url}/${id_accettazione}`).subscribe(res=>{
      console.log('delete', id_accettazione);
      this.getAccettazione()
    })
  }
  postAccettazione(nuova_accettazione:Accettazione){
    this.http.post(this.url, nuova_accettazione).subscribe(res=>{
      console.log('post', nuova_accettazione);
      this.getAccettazione()
    })
  }
  updateAccettazione(id_accettazione:number, nuova_accettazione:Accettazione){
    this.http.patch(`${this.url}/${id_accettazione}`, nuova_accettazione).subscribe(res=>{
      console.log('patch', nuova_accettazione);
      this.getAccettazione()
    })
  }
}
