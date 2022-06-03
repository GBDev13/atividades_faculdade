#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <locale.h>

int destino, origem, vertices = 0, RA[7];
float custo, *custos = NULL;


void dijkstra(int vertices,int origem,int destino,float *custos);
void menu_mostrar(void);
void grafo_procurar(void);
void grafo_criar(void);


int main() {
	int opt;
	setlocale(LC_ALL, "Portuguese");
 
	grafo_criar();
	if (vertices > 0) {
	 	grafo_procurar();
	}
	
	return 0;
}

//Implementação do algoritmo de Dijkstra
void dijkstra(int vertices,int origem,int destino,float *custos){
	int i, v, cont = 0;
	int *ant, *tmp;
	int *z;
	double min;
	double dist[vertices];
	
 	ant = (int*) calloc (vertices, sizeof(int *));
	if (ant == NULL) {		
		printf ("** Erro: Memoria Insuficiente **");
		exit(-1);
	}
 	tmp = (int*) calloc (vertices, sizeof(int *));
	if (tmp == NULL) {
		printf ("** Erro: Memoria Insuficiente **");
		exit(-1);
	}
 	z = (int *) calloc (vertices, sizeof(int *));
	if (z == NULL) {
		printf ("** Erro: Memoria Insuficiente **");
		exit(-1);
	}
	for (i = 0; i < vertices; i++) {
		if (custos[(origem - 1) * vertices + i] !=- 1) {
			ant[i] = origem - 1;
			dist[i] = custos[(origem-1)*vertices+i];
		}
	 	else {
	 		ant[i]= -1;
	 		dist[i] = HUGE_VAL;
	 	}
	 	z[i]=0;
	}
 	z[origem-1] = 1;
 	dist[origem-1] = 0;
 
 	do { 
 		min = HUGE_VAL;
 		for (i=0;i<vertices;i++){
			if (!z[i]){
				if (dist[i]>=0 && dist[i]<min) {
					min=dist[i];v=i;
				}
			}
 		} 
 		if (min != HUGE_VAL && v != destino - 1) {
 			z[v] = 1;
 			for (i = 0; i < vertices; i++){
 				if (!z[i]) {
 					if (custos[v*vertices+i] != -1 && dist[v] + custos[v*vertices+i] < dist[i]) {
 						dist[i] = dist[v] + custos[v*vertices+i];
 						ant[i] =v;
 					}
 				}
 			}
 		}
 	}while (v != destino - 1 && min != HUGE_VAL);
 	printf("\tDe %d para %d: \t", origem, destino);
 	if (min == HUGE_VAL) {
		 printf("Nao Existe\n");
		 printf("\tCusto: \t- \n");
 	}
 	else{
		i = destino;
		i = ant[i-1];
		while (i != -1) {
			tmp[cont] = i+1;
			cont++;
			i = ant[i];
 		}
		for (i = cont; i > 0 ; i--) {
	 		printf("%d -> ", tmp[i-1]);
	 	}
		printf("%d", destino);
		printf("\n\tCusto: %.2f\n",(float) dist[destino-1]);
 	}
}
void grafo_criar(void){
	int i;
 	
 	vertices = 5;
 	
	if (!custos){
		free(custos);
	}
 	custos = (float *) malloc(sizeof(float)*vertices*vertices);
	
	if (custos == NULL) {
		system("color fc");
	 	printf ("** Erro: Memoria Insuficiente **");
	 	exit(-1);
	} 
 
  
 	for (i = 0; i <= vertices * vertices; i++){
 		custos[i] = -1;
 	}
 
 	
 	system("cls");
 	printf("Informe os 7 primeiros digitos do seu RA\nCaso tenha 6, acrescente 1 como Setimo: \n");
 	
 	for(i = 0; i < 7; i++){
 		printf("Informe o %d º digito do RA: ", (i+1));
 		scanf("%d",&RA[i]);	
	}
	
 	custos[(1-1) * vertices + 2 - 1] = RA[0] * 6.596;
 	custos[(1-1) * vertices + 3 - 1] = RA[1] * 6.596;
 	custos[(2-1) * vertices + 3 - 1] = RA[2] * 6.596;
 	custos[(2-1) * vertices + 5 - 1] = RA[3] * 6.596;
 	custos[(3-1) * vertices + 4 - 1] = RA[4] * 6.596;
 	custos[(3-1) * vertices + 5 - 1] = RA[5] * 6.596;
 	custos[(4-1) * vertices + 5 - 1] = RA[6] * 6.596;
 	
 	
 	
}

//Busca os menores caminhos entre os vértices
void grafo_procurar(void){
	int i, j;
	system("cls");
	printf("Caminho de menor custo saindo da cidade 1 e chegando na cidade 5: \n");
	printf("\nDigitos do RA: ");
	for(i = 0; i < 7; i++){
		printf("%d", RA[i]);
	}
	printf("\n");
 	for (i = 1; i <= vertices; i++) {
 		for (j = 1; j <= vertices; j++) {
 			dijkstra(vertices, i,j, custos);
 		}
 		printf("\n");
 	}
 	system("pause");
 
}

