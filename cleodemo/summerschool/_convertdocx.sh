find . -name "*.docx" -exec  sh -c 'echo soffice --headless --convert-to txt:Text \"{}\"  --outdir  \""$(dirname "{}")"\"' \; > prova.txt
find . -name "*.txt" -exec sh -c 'echo mv \"{}\" \""$(dirname "{}")/description.txt\""' \; > prova2.txt
find . -name "*.txt" -exec sh -c 'echo label: "$(head -1 "{}")" >  "$(dirname "{}")"/info.yml' \;
find . -name "*.txt" -exec sh -c 'echo description: "$(tail -n+2 "{}")" >>  "$(dirname "{}")"/info.yml' \;

