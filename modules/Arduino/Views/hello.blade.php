<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>IDE Arduino Online</title>
    <style>
        body {
            background: #e5e5e5;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .arduino-header {
            background: #00979d;
            color: #fff;
            padding: 18px 30px;
            font-size: 1.6em;
            font-weight: bold;
            letter-spacing: 1px;
            box-shadow: 0 2px 8px #0002;
        }
        #editor {
            height: 80vh;
            border: 1px solid #bdbdbd;
            border-radius: 6px;
            margin: 30px auto 0 auto;
            width: 90vw;
            max-width: 900px;
            font-family: 'Fira Mono', 'Consolas', 'Menlo', monospace;
            box-shadow: 0 4px 24px #0001;
            background: #222;
        }
        #codeForm {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin: 20px auto 0 auto;
            width: 90vw;
            max-width: 900px;
        }
        #codeForm button {
            background: #00979d;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 28px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 2px 8px #0002;
            transition: background 0.2s;
        }
        #codeForm button:hover {
            background: #007c80;
        }
    </style>
</head>
<body>
    <div class="arduino-header">
        IDE Arduino Online
    </div>

    <form id="codeForm" method="POST" action="{{ route('export.ino') }}">
        @csrf
        <textarea name="code" id="code" hidden></textarea>
        <button type="submit">Exportar .ino</button>
    </form>

    <div id="editor"></div>

    <script src="https://unpkg.com/monaco-editor@0.44.0/min/vs/loader.js"></script>
    <script>
        require.config({ paths: { 'vs': 'https://unpkg.com/monaco-editor@0.44.0/min/vs' }});
        require(['vs/editor/editor.main'], function () {
            const editor = monaco.editor.create(document.getElementById('editor'), {
                value: `void setup() {
  Serial.begin(9600);
  pinMode(LED_BUILTIN, OUTPUT);
}

void loop() {
  digitalWrite(LED_BUILTIN, HIGH);
  delay(1000);
  digitalWrite(LED_BUILTIN, LOW);
  delay(1000);
}`,
                language: 'cpp',
                theme: 'vs-dark',
                fontFamily: 'Fira Mono, Consolas, Menlo, monospace',
                fontSize: 16,
                minimap: { enabled: true },
                automaticLayout: true,
                scrollBeyondLastLine: true,
                wordWrap: 'on',
                lineNumbers: 'on',
                lineNumbersMinChars: 3,
                folding: true,
                renderLineHighlight: 'all',
                renderWhitespace: 'all',
                contextmenu: true,
                quickSuggestions: true,
                suggestOnTriggerCharacters: true,
                parameterHints: { enabled: true },
                autoClosingBrackets: 'always',
                autoClosingQuotes: 'always',
                formatOnType: true,
                formatOnPaste: true,
                codeLens: true,
                lightbulb: { enabled: true },
                hover: { enabled: true },
                links: true,
                overviewRulerLanes: 3,
                overviewRulerBorder: true,
                scrollbar: {
                    vertical: 'auto',
                    horizontal: 'hidden',
                    verticalScrollbarSize: 8,
                    horizontalScrollbarSize: 8,
                    handleMouseWheel: true
                },
                colorDecorators: true,
                fixedOverflowWidgets: true,
                accessibilitySupport: 'auto',
                tabSize: 2,
                insertSpaces: true,
                detectIndentation: true,
                renderIndentGuides: true,
                renderFinalNewline: true,
                useTabStops: true,
                wordBasedSuggestions: true,
                suggestFontSize: 14,
                suggestLineHeight: 22,
                suggestSelection: 'first',
                snippetSuggestions: 'inline',
                suggestFilterGraceful: true
            });

            // Exportar o código do editor no formulário
            const form = document.getElementById('codeForm');
            form.addEventListener('submit', function () {
                document.getElementById('code').value = editor.getValue();
            });

            // Auto completar comandos básicos do Arduino
            monaco.languages.registerCompletionItemProvider('cpp', {
                provideCompletionItems: () => {
                    const suggestions = [
                       {!! file_get_contents(base_path('modules/Arduino/Views/suggestions.blade.php')) !!}
                    ];
                    return { suggestions };
                }
            });
        });
    </script>
</body>
</html>
