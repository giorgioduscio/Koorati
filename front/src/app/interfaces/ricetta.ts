export interface Ricetta {
  id_ricetta        :number
  id_utente         :number
  id_operatore      :number
  id_prestazione    :number
  data_ricetta      :string
  priorità_richiesta:string
  diagnosi          :string
  esenzione_ticket  :string
}
