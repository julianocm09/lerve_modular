
  {
    label: 'pinMode',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'pinMode(${1:pin}, ${2:MODE});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Configura o modo de um pino: INPUT, OUTPUT ou INPUT_PULLUP.'
  },
  {
    label: 'digitalWrite',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'digitalWrite(${1:pin}, ${2:valor});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Escreve um valor HIGH ou LOW em um pino digital.'
  },
  {
    label: 'digitalRead',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'digitalRead(${1:pin});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Lê o estado de um pino digital.'
  },
  {
    label: 'analogRead',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'analogRead(${1:pin});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Lê o valor de um pino analógico.'
  },
  {
    label: 'analogWrite',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'analogWrite(${1:pin}, ${2:valor});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Escreve um valor PWM em um pino.'
  },
  {
    label: 'Serial.begin',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'Serial.begin(${1:9600});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Inicializa a comunicação serial.'
  },
  {
    label: 'Serial.print',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'Serial.print(${1:variavel});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Imprime dados na serial sem quebra de linha.'
  },
  {
    label: 'Serial.println',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'Serial.println(${1:variavel});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Imprime dados na serial com quebra de linha.'
  },
  {
    label: 'Serial.printf',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'Serial.printf("${1:format}\\n", ${2:variavel});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Imprime texto formatado na porta serial.'
  },
  {
    label: 'Serial.available',
    kind: monaco.languages.CompletionItemKind.Property,
    insertText: 'Serial.available()',
    documentation: 'Retorna quantos bytes estão disponíveis na serial.'
  },
  {
    label: 'Serial.read',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'Serial.read();',
    documentation: 'Lê um byte da serial.'
  },
  {
    label: 'delay',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'delay(${1:1000});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Pausa a execução por milissegundos.'
  },
  {
    label: 'delayMicroseconds',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'delayMicroseconds(${1:us});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Pausa por microssegundos.'
  },
  {
    label: 'millis',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'millis()',
    documentation: 'Retorna o tempo desde o início em milissegundos.'
  },
  {
    label: 'micros',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'micros()',
    documentation: 'Retorna o tempo desde o início em microssegundos.'
  },
  {
    label: 'digitalToggle',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'digitalToggle(${1:pin});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Inverte o estado do pino digital.'
  },
  {
    label: 'setup',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'void setup() {\n\t${1}\n}',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Função de inicialização.'
  },
  {
    label: 'loop',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'void loop() {\n\t${1}\n}',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Função de repetição contínua.'
  },
  {
    label: 'WiFi.begin',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'WiFi.begin("${1:ssid}", "${2:senha}");',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Conecta-se a uma rede Wi-Fi.'
  },
  {
    label: 'WiFi.status',
    kind: monaco.languages.CompletionItemKind.Property,
    insertText: 'WiFi.status()',
    documentation: 'Verifica o status da conexão Wi-Fi.'
  },
  {
    label: 'WiFi.localIP',
    kind: monaco.languages.CompletionItemKind.Property,
    insertText: 'WiFi.localIP()',
    documentation: 'Retorna o IP local.'
  },
  {
    label: 'WiFi.softAP',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'WiFi.softAP("${1:ssid}", "${2:senha}");',
    documentation: 'Cria uma rede Wi-Fi em modo Access Point.'
  },
  {
    label: 'WiFi.softAPIP',
    kind: monaco.languages.CompletionItemKind.Property,
    insertText: 'WiFi.softAPIP()',
    documentation: 'Retorna o IP do ESP em modo AP.'
  },
  {
    label: 'HTTPClient',
    kind: monaco.languages.CompletionItemKind.Class,
    insertText: 'HTTPClient http;',
    documentation: 'Cria cliente HTTP para requisições GET/POST.'
  },
  {
    label: 'http.begin',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'http.begin("${1:url}");',
    documentation: 'Inicia uma conexão HTTP.'
  },
  {
    label: 'http.GET',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'int httpCode = http.GET();',
    documentation: 'Realiza uma requisição GET.'
  },
  {
    label: 'http.POST',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'int httpCode = http.POST("${1:dados}");',
    documentation: 'Realiza uma requisição POST.'
  },
  {
    label: 'http.getString',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'String resposta = http.getString();',
    documentation: 'Retorna o corpo da resposta HTTP.'
  },
  {
    label: 'touchRead',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'touchRead(${1:pin});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Lê o valor de um pino de toque capacitivo (ESP32).'
  },
  {
    label: 'ledcAttachPin',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'ledcAttachPin(${1:pin}, ${2:canal});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Associa pino a canal PWM (ESP32).'
  },
  {
    label: 'ledcWrite',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'ledcWrite(${1:canal}, ${2:valor});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Escreve valor PWM no canal (ESP32).'
  },
  {
    label: 'EEPROM.begin',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'EEPROM.begin(${1:tamanho});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Inicializa a EEPROM (ESP32).'
  },
  {
    label: 'EEPROM.read',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'EEPROM.read(${1:endereco});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Lê um byte da EEPROM.'
  },
  {
    label: 'EEPROM.write',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'EEPROM.write(${1:endereco}, ${2:valor});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Escreve um byte na EEPROM.'
  },
  {
    label: 'EEPROM.commit',
    kind: monaco.languages.CompletionItemKind.Method,
    insertText: 'EEPROM.commit();',
    documentation: 'Grava alterações na EEPROM (ESP32).'
  },
  {
    label: 'esp_sleep_enable_timer_wakeup',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'esp_sleep_enable_timer_wakeup(${1:tempo_us});',
    insertTextRules: monaco.languages.CompletionItemInsertTextRule.InsertAsSnippet,
    documentation: 'Configura o ESP32 para acordar após determinado tempo.'
  },
  {
    label: 'esp_deep_sleep_start',
    kind: monaco.languages.CompletionItemKind.Function,
    insertText: 'esp_deep_sleep_start();',
    documentation: 'Coloca o ESP32 em sono profundo.'
  }
  