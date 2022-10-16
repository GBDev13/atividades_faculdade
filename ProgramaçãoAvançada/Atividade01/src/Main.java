import java.util.Scanner;
import java.util.HashMap;

public class Main {
    public static void main(String[] args)
    {
        System.out.println("Digite a quantidade de pessoas que irão participar da pesquisa");
        Scanner scan = new Scanner(System.in);
        int qtd = scan.nextInt();

        Candidato[] candidatos = new Candidato[2];

        candidatos[0] = new Candidato(1, "Zé da Farmácia");
        candidatos[1] = new Candidato(2, "Rita da Padaria");

        System.out.println("\nCandidatos:\n");
        for (int i = 0; i < candidatos.length; i++) {
            System.out.println(candidatos[i].numero + " - " + candidatos[i].nome);
        }

        HashMap<Integer,Integer> votos = new HashMap<Integer, Integer>();

        for(int i = 0; i < candidatos.length; i++)
        {
            votos.put(candidatos[i].numero, 0);
        }

        for (int i = 1; i <= qtd; i++)
        {
            System.out.println("Insira o voto do participante " + i);

            int voto = scan.nextInt();

            while (votos.get(voto) == null) {
                System.out.println("Insira um candidato válido");
                voto = scan.nextInt();
            }

            votos.replace(voto, votos.get(voto) + 1);
        }

        System.out.println("\nResultados:");

        for(int i = 0; i < candidatos.length; i++)
        {
            Candidato candidato = candidatos[i];
            int qtdVotos = votos.get(candidato.numero);
            String porcentagem = String.format("%.2f", (qtdVotos * 100f) / qtd);
            String texto = (qtdVotos == 1) ? " voto" : " votos";
            System.out.println(candidato.nome + " - " + qtdVotos + texto + " (" + porcentagem + "%)");
        }
    }
}