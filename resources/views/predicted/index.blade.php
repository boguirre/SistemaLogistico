<html>
<head>
<link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />
<script defer src="https://pyscript.net/alpha/pyscript.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<py-env>
   - pandas
   - pystan
   - fbprophet
</py-env>
</head>
<body>
<div class="jumbotron">
   <h1>PREDICCIONES DE DEMANDA DE PRODUCTOS</h1>
   <p class="lead">
      Grafico representativa de la demanda de productos en un periodo de 2 años
   </p>
</div>
<div class="row">
   <div class="col-sm-6 p-2 shadow ml-4 mr-4 mb-4 bg-white rounded">
      <div id="chart1"></div>
   </div>
</div>
<py-script>
# Import libraries
import pandas as pd 
from fbprophet import Prophet 
from fbprophet.plot import add_changepoints_to_plot
from pyodide.http import open_url

url = 'https://raw.githubusercontent.com/rahulhegde99/Time-Series-Analysis-and-Forecasting-of-Air-Passengers/master/airpassengers.csv'
url_content = open_url(url)
data = pd.read_csv(url_content)
data.head()

df = pd.DataFrame() 
df['ds'] = pd.to_datetime(data['Month']) 
df['y'] = data['#Passengers'] 
df.head() 

m = Prophet() 
m.fit(df)

future = m.make_future_dataframe(periods=12 * 2, freq='M') 

forecast = m.predict(future) 
forecast[['ds', 'yhat', 'yhat_lower', 'yhat_upper', 'trend', 'trend_lower', 'trend_upper']].tail()

fig1 = m.plot(forecast) 
pyscript.write("chart1", fig1)
{{-- import pandas as pd 
import matplotlib.pyplot as plt
import seaborn as sns
# Get the data
from pyodide.http import open_url
url = 'https://raw.githubusercontent.com/rahulhegde99/Time-Series-Analysis-and-Forecasting-of-Air-Passengers/master/airpassengers.csv'
url_content = open_url(url)
data = pd.read_csv(url_content)
data.head()

df = pd.DataFrame() 
df['ds'] = pd.to_datetime(data['Month']) 
df['y'] = data['#Passengers'] 
df.head()

from fbprophet import Prophet 
from fbprophet.plot import add_changepoints_to_plot
m = Prophet() 
m.fit(df)

future = m.make_future_dataframe(periods=12 * 2, freq='M') 
forecast = m.predict(future) 
forecast[['ds', 'yhat', 'yhat_lower', 'yhat_upper', 'trend', 'trend_lower', 'trend_upper']].tail()

fig1 = m.plot(forecast)
pyscript.write("chart1",fig1) --}}
</py-script>
</body>
</html>
{{-- <!DOCTYPE html>
<html lang="es">

<html>

<head>
    <title>Sistema Logistico </title>
    <link href="{{asset('/layouts/vertical-dark-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/layouts/vertical-dark-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega@5"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega-lite@5"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega-embed@6"></script>
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.9.3/dist/js/tabulator.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-2.4.2.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-widgets-2.4.2.min.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-tables-2.4.2.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/@holoviz/panel@0.13.0/dist/panel.min.js"></script>



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

<body class="layout-boxed">
    <br>

    <a href="{{url('/employees/create')}}" class="btn btn-xm btn-primary" style="float: right;">Regresar A Menú
        Principal</a>
    <br>
    <br>
    <h1 class="text-center"> Módulo para predecir los pedidos</h1>

    <br>
    <div class="row">


        <div class="col" style="display: flex;
           justify-content: center !important;">
            <div class="card">

                <div class="card-body">
                    <h5 class="text-center">Subir Archivo En Formato CSV</h5>

                    <div id="fileinput"></div>
                    <div id="upload"></div>
                    <div id="to_predict"></div>
                    <div id="op"></div>

                    <p id="regression-op">
                    <div id="plot"></div>

                </div>
            </div>
        </div>
    </div>




    <py-script output="plot">
        import matplotlib.pyplot as plt
        import seaborn as sns
        import pandas as pd
        import asyncio
        import panel as pn
        from panel.io.pyodide import show
        import numpy as np
        from sklearn.neural_network import MLPRegressor


        fileInput = pn.widgets.FileInput(accept=".csv")
        uploadButton = pn.widgets.Button(name="Show Prediction", button_type = 'primary')
        to_predict = pn.widgets.Spinner(name="Total Installs", value=0, step=1, start=1)


        def process_file(event):
        if fileInput.value is not None:
        data = pd.read_csv(io.BytesIO(fileInput.value),sep=';')

        x = data['Tiempo'] #change column name
        y = data['Carga'] #change column name

        X=x[:,np.newaxis]
        i=0
        plt.figure(figsize=(20,10))
        plt.rc('font',size=16)
        colors=['teal','pink','brown','hotpink','orchid','aqua','green','blue','yellow','purple','black','tomato','salmon','olive','chocolate','wheat']

        while True:
        i=i+1
        from sklearn.model_selection import train_test_split
        X_train, X_test, y_train, y_test = train_test_split(X,y)
        mlr=MLPRegressor(solver = 'lbfgs',alpha=1e-5,hidden_layer_sizes=(3,3),random_state=1)
        mlr.fit(X_train,y_train)
        print(mlr.score(X_train,y_train))
        plt.scatter(X_train,y_train,color='orange', label="Training set" if i==1 else "")
        plt.scatter(X_test,y_test,color='red', label="test set" if i==1 else "")
        plt.scatter(X,mlr.predict(X),color=colors[i], label="ITERACIÓN" +str(i))
        if mlr.score(X_train,y_train) > 0.95:
        break
        predicted = mlr.predict(np.array([[to_predict.value]]))
        plt.xlabel('tiempo')
        plt.ylabel('carga')
        plt.legend(loc='lower right')
        plt.show()
        reg_op = Element('regression-op')
        reg_op.write(predicted)








        await show(fileInput, 'fileinput')
        await show(uploadButton, 'upload')
        await show(to_predict, 'to_predict')
        uploadButton.on_click(process_file)




    </py-script>
</body>

</html> --}}
{{-- 
@extends('layouts.panel')

@section('css')
    <link rel="stylesheet" href="https://pyscript.net/latest/pyscript.css" />
    <script defer src="https://pyscript.net/latest/pyscript.js"></script>
    <py-env>
        - pandas
    </py-env>
@endsection

@section('content')
<b><p>Today is <u><label id='today'></label></u></p></b>
    <br>
    <div id="data" class="alert alert-primary"></div>
    <py-script>
        import pandas as pd 

        data = pd.read_csv('https://raw.githubusercontent.com/rahulhegde99/Time-Series-Analysis-and-Forecasting-of-Air-Passengers/master/airpassengers.csv') 
        data.head()
    </py-script>


@endsection

@section('scripts')

@endsection --}}