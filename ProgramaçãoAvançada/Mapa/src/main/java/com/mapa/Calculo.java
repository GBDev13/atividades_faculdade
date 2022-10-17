package com.mapa;

import jakarta.servlet.*;
import jakarta.servlet.http.*;
import jakarta.servlet.annotation.*;

import java.io.IOException;
import java.io.PrintWriter;

public class Calculo extends HttpServlet {
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String modelo = request.getParameter("modelo");
        double valorGasolina = Double.parseDouble(request.getParameter("valorGasolina"));
        double kml = Double.parseDouble(request.getParameter("kml"));
        double valorMedioRevisao = Double.parseDouble(request.getParameter("valorMedioRevisao"));
        double valor4Pneus = Double.parseDouble(request.getParameter("valor4Pneus"));

        double valorKmRodado = (valorGasolina / kml) + (valorMedioRevisao / 10000) + (valor4Pneus / 50000);

        response.setContentType("text/html");

        PrintWriter out = response.getWriter();
        out.println("<html>\n" +
                "<head>\n" +
                "<script src=\"https://cdn.tailwindcss.com\"></script>\n" +
                "<title>Resultado - Cálculo KM Rodado</title>\n" +
                "</head>\n" +
                "<body class=\"w-screen min-h-screen bg-gray-900 text-gray-100 flex items-center justify-center flex-col\">");
        out.println("<h1 class=\"font-bold text-4xl mb-8\">Calculo Km Rodado para o modelo " + modelo + "</h1>");
        out.println("<div class=\"flex flex-col gap-4 items-center justify-center\">");
        out.println("<div class=\"flex gap-2 items-center\"><strong class=\"text-xl\">Valor da gasolina: </strong><span class=\"text-gray-400\">" + valorGasolina + "</span></div>");
        out.println("<div class=\"flex gap-2 items-center\"><strong class=\"text-xl\">Media do Veículo: </strong><span class=\"text-gray-400\">" + kml + "</span></div>");
        out.println("<div class=\"flex gap-2 items-center\"><strong class=\"text-xl\">Revisão 10 mil: </strong><span class=\"text-gray-400\">" + valorMedioRevisao + "</span></div>");
        out.println("<div class=\"flex gap-2 items-center\"><strong class=\"text-xl\">Pneu 50 mil: </strong><span class=\"text-gray-400\">" + valor4Pneus + "</span></div>");
        out.println("<div class=\"flex gap-2 items-center\"><strong class=\"text-xl\">Valor do Km Rodado: </strong><span class=\"text-gray-400\">" + valorKmRodado + "</span></div>");
        out.println("<div class=\"flex gap-2 items-center\"><strong class=\"text-xl\">Com acréscimo de 15%: </strong><span class=\"text-gray-400\">" + valorKmRodado * 1.15 + "</span></div>");
        out.println("</div>");
        out.println("<button type=\"button\" class=\"bg-cyan-500 py-2 px-4 text-center rounded mt-4\" onclick=\"handleGoHome()\">Voltar ao início</button>");
        out.println("<script>\n" +
                "function handleGoHome() {\n" +
                "window.location.href = window.location.pathname.replace(\"/calculo\", \"\");\n" +
                "}\n" +
                "</script>");
        out.println("</body></html>");
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

    }
}
