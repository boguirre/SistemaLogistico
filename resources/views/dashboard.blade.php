{{-- @extends('layouts.panel')

@section('content')
<div class="container">
    <div class="card-body">
        <br>
        <h4 class="text-center">DASHBOARD</h4>

        <div id="plot"></div>
        <py-script output="plot">

            import matplotlib
            import matplotlib.pyplot as plt
            import numpy as np

            t = np.arange(0.0,2.0,0.01)
            s= 1+ np.sin(2 * np.pi * t)

            fig,ax = plt.subplots()
            ax.plot(t,s)

            ax.set(xlabel='time(s)', ylabel='voltage(mV)',
            title= 'Abour')
            ax.grid()
            fig

        </py-script>|


    </div>
</div>
@endsection --}}

<html>

<head>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega@5"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega-lite@5"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega-embed@6"></script>
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.9.3/dist/js/tabulator.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-2.4.2.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-widgets-2.4.2.min.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-tables-2.4.2.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/@holoviz/panel@0.13.0/dist/panel.min.js"></script>
    <script type="text/javascript">
      Bokeh.set_log_level("info");
    </script>

    <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />
    <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
    <py-env>
        - numpy
        - pandas
        - matplotlib
        - seaborn
        - scikit-learn
        - scipy
        - panel==0.13.1a2
    </py-env>
</head>

<body>
    <h1>Upload csv</h1>

        
          
                <div id="fileinput"></div>
                <div id="upload"></div>
                <div id="to_predict"></div>
                <div id="op"></div>

                <p id="regression-op"></div>
            
        
     
    <py-script>
import matplotlib.pyplot as plt
import seaborn as sns
import pandas as pd
import asyncio
import panel as pn
from panel.io.pyodide import show
import numpy as np
from sklearn.linear_model import LinearRegression

fileInput = pn.widgets.FileInput(accept=".csv")
uploadButton = pn.widgets.Button(name="Show Prediction", button_type = 'primary')
to_predict = pn.widgets.Spinner(name="Total Installs", value=0, step=1, start=1)

def process_file(event):
    if fileInput.value is not None:
        data = pd.read_csv(io.BytesIO(fileInput.value))
        y = data[['arpi']]  #change column name
        X = data[['total_installs']]  #change column name
        
        # regression part
        X = X 
        y = y 
        reg = LinearRegression().fit(X, y)
        reg.score(X, y)

        print(reg.coef_)

        predicted = reg.predict(np.array(to_predict.value).reshape(1, -1))

        reg_op = Element('regression-op')
        reg_op.write(predicted)

         


        


await show(fileInput, 'fileinput')
await show(uploadButton, 'upload')
await show(to_predict, 'to_predict')
uploadButton.on_click(process_file)



    </py-script>
</body>

</html>