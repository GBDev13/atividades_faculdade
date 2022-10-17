<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Cálculo KM Rodado</title>
</head>
<body class="w-screen min-h-screen bg-gray-900 text-gray-100 flex items-center justify-center flex-col">

<h1 class="font-bold text-4xl mb-8">Calculo Km Rodado</h1>

<form action="calculo" method="get" class="w-full max-w-[800px] flex flex-col gap-4 items-center justify-center">
    <label for="modelo" class="flex flex-col items-center gap-2 w-full max-w-[300px]">
        Modelo do Carro:
        <input type="text" id="modelo" name="modelo" class="text-gray-900 outline-none py-2 px-4 rounded w-full" />
    </label>

    <label class="flex flex-col items-center gap-2 w-full max-w-[300px]" for="valorGasolina">
        Valor da Gasolina:
        <input step=".01" class="text-gray-900 outline-none py-2 px-4 rounded w-full" type="number" id="valorGasolina" name="valorGasolina" />
    </label>

    <label class="flex flex-col items-center gap-2 w-full max-w-[300px]" for="kml">
        Quantos Km/L o Carro Faz?
        <input step=".01" class="text-gray-900 outline-none py-2 px-4 rounded w-full" type="number" id="kml" name="kml" />
    </label>

    <label class="flex flex-col items-center gap-2 w-full max-w-[300px]" for="valorMedioRevisao">
        Valor médio da revisão a cada 10 mil KM:
        <input step=".01" class="text-gray-900 outline-none py-2 px-4 rounded w-full" type="number" id="valorMedioRevisao" name="valorMedioRevisao" />
    </label>

    <label class="flex flex-col items-center gap-2 w-full max-w-[300px]" for="valor4Pneus">
        Valor de 4 pneus que rodam 50 mil KM:
        <input step=".01" class="text-gray-900 outline-none py-2 px-4 rounded w-full" type="text" id="valor4Pneus" name="valor4Pneus" />
    </label>

    <span>Estima-se acréscimo de 15% no cálculo do KM rodado por desgaste e desvalorização do veículo</span>

    <button type="submit" class="bg-cyan-500 py-2 w-[300px] rounded">Calcular</button>
</form>

</body>
</html>