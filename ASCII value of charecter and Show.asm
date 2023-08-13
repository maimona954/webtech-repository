.MODEL SMALL
.STACK 100H
.DATA
VAR1 DB "TYPE A CHARACTER: $"
VAR2 DB 0DH,0AH,"THE ASCII CODE OF $"
VAR3 DB " IN BINARY IS $"
VAR4 DB 0DH,0AH,"THE NUMBER OF 1 BITS IS $"

.CODE
MAIN PROC
    MOV AX,@DATA
    MOV DS,AX
    
    MOV AH,9
    LEA DX,VAR1
    INT 21H
    
    
    MOV AH,1
    INT 21H
    MOV BL, AL
     
    MOV AH,9
    LEA DX,VAR2
    INT 21H
    
    MOV AH,2
    MOV DL,BL
    INT 21H 

    MOV AH,9
    LEA DX,VAR3
    INT 21H

    
    MOV CX,8
    MOV BH,0
    
    BINARY:
    SHL BL,1
    JNC ZERO:
    INC BH
    MOV DL,31H
    JMP DISPLAY
    
    ZERO:
    MOV DL,30H
    
    DISPLAY:
    MOV AH,2
    INT 21H
    
    LOOP BINARY
    
    ADD BH,30H  
    
    MOV AH,9
    LEA DX,VAR4 
    INT 21H  
             
    MOV AH,2             
    MOV DL,BH
    INT 21H
    

    
    MOV AH,4CH
    INT 21H
    MAIN ENDP
END MAIN