export function paragraph(phrase:string) {
  if(phrase) return phrase[0].toUpperCase() +phrase.slice(1) .replaceAll('_',' ')
  return ''
}