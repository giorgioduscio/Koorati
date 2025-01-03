export interface Fatturazione {
  id_fatturazione       :number
  copertura_prestazione :string //(tre livelli, trovare il modo)
  convenzione_struttura :string //(pubbliche o private, che siano interamente, parzialmente o non convenzionati)
  id_reparto            :number
  id_struttura          :number
}
