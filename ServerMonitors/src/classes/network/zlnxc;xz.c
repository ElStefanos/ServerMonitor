#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(){

    char odg;
    char unos;

    printf("Manja ili veca ?\n");

    printf("Ako zelite da igrate,potvrdite odgovor: Y/N\n");

    scanf("%c",&odg);

    if(odg == 'Y' || odg == 'y')
        {
        printf("Hajde da krenemo!\n");
        }
    else
        {
        printf("\nNikada od tebe nece biti ista\n-Tvoja mama\n");
        }

    printf("\nUnesite > za vece < za manje\n");


    
    int broj = srand(time(0));
    int zadnja = broj;
    printf("\nVas prvi broj je:\n %d",broj);

    printf("\nVeca ili Manja?\n");
    int rezultat;

    do {
        rezultat = 1;
        scanf("\n %c",&unos);
        broj = srand(time(0));
        if (unos == ">" ){
            if (broj > zadnja){
                printf("Pogodili ste\n");
                printf("Vas broj je: %d",broj);
                zadnja = broj;
            } else {
                printf("Pogresili ste\n");
                printf("Vas broj je: %d %d",broj ,zadnja);
                rezultat = 0;
            } 
        } else {
            if (broj < zadnja){
                printf("Pogodili ste\n");
                printf("Vas broj je: %d",broj);
                zadnja = broj;
            } else {
                printf("Pogresili ste\n");
                printf("Vas broj je: %d %d",broj ,zadnja);
                rezultat = 0;
            } 
        }

    } while(rezultat == 1);

    return 0;
}