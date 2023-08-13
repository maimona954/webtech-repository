.MODEL SMALL
.STACK 100H
.DATA
    VAR1 DB "EVEN PARITY $"
    VAR2 DB "ODD PARITY $"
    

.CODE
MAIN PROC 
    
    MOV AX, @DATA                
    MOV DS, AX
    
    MOV CH,0 
    
    MOV AH,1
    INT 21H
    
    
    WHILE: 
    
    CMP AL,0DH
    JE END_WHILE 
    
     
    MOV BL,AL 
    MOV BH,30H  
    
    CMP BL,BH
    JZ ZERO:
    INC CH  
    
    MOV AH,1
    INT 21H
    JMP WHILE 
    
    ZERO:
    MOV AH,1
    INT 21H 
    JMP WHILE
    
    
    
    END_WHILE:
    
    
    MOV AH,2
    MOV DL,0AH
    INT 21H
    MOV DL,0DH
    INT 21H
    

     
    MOV AH,0
    MOV AL,CH
    MOV BL,2
    DIV BL
    
    CMP AH,01H
    JE L1    
    
    LEA DX,VAR1
    MOV AH,9
    INT 21H
    JMP EXIT
    
    L1:
    LEA DX,VAR2 
    MOV AH,9
    INT 21H
    JMP EXIT  
    
    EXIT:
    
    
    MOV AH,4CH
    INT 21H
    MAIN ENDP
END MAIN