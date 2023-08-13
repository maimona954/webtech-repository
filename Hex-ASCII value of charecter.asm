.MODEL SMALL                                                  
.STACK 100H
.DATA

VAR1 DB 0DH,0AH,"TYPE A CHARACTER : $"
VAR2 DB 0DH,0AH,"THE ASCII CODE OF $"
VAR3 DB "IN HEX IS $"

.CODE
MAIN PROC
    MOV AX, @DATA                
    MOV DS, AX

    START:                      
    LEA DX, VAR1        
    MOV AH, 9
    INT 21H
    
    MOV AH, 1                
    INT 21H

    MOV BL, AL               

    CMP BL, 0DH              
    JE END                   
    
    MOV AH, 9
    LEA DX, VAR2        
    INT 21H
    
    MOV AH,2
    MOV DL,BL
    INT 21H
     
    MOV AH, 9 
    LEA DX, VAR3        
    INT 21H

    XOR DX, DX               
    MOV CX, 4                

    LOOP_1:                  
        SHL BL, 1            
        RCL DL, 1            
                             
    LOOP LOOP_1              

    MOV CX, 4                 

    LOOP_2:                   
        SHL BL, 1             
        RCL DH, 1             
                              
    LOOP LOOP_2            

    MOV BX, DX             
    MOV CX, 2              

    LOOP_3:                
    CMP CX, 1              
    JE SECOND_DIGIT        
    MOV DL, BL             
    JMP NEXT               

    SECOND_DIGIT:          
    MOV DL, BH             

    NEXT:                  

    MOV AH, 2              

    CMP DL, 9              
    JBE NUMERIC_DIGIT      
    SUB DL, 9              
    OR DL, 40H             
    JMP DISPLAY            

    NUMERIC_DIGIT:         
    OR DL, 30H             

    DISPLAY:                
    INT 21H                
    LOOP LOOP_3               
     
    JMP START                 

    END:                        
    
    MOV AH, 4CH                  
    INT 21H
    MAIN ENDP
END MAIN