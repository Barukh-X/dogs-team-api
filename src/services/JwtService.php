<?php

class JwtService
{
  private string $secret;
  private string $algo = 'HS256';
  
  
  public function __construct(?string $secret = null)
  {
    $this->secret = 'chavetemp';
  }
  
  public function gerar(array $payload, int $expiraEmSegundos = 3600): string {
    $header = ['typ' => 'JWT', 'alg' => $this->algo];
    
    $payload['iat'] = time();
    $payload['exp'] = time() + $expiraEmSegundos;
    
    $headerCodificado = $this->base64UrlEncode(json_encode($header));
    $payloadCodificado = $this->base64UrlEncode(json_encode($payload));
    
    $assinatura = hash_hmac('sha256', "$headerCodificado.$payloadCodificado", $this->secret,  true);
    $assinaturaCodificada = $this->base64UrlEncode($assinatura);
    
    return "$headerCodificado.$payloadCodificado.$assinaturaCodificada";
  }
  
  public function validar(string $token): ?array {
    
    $partes = explode('.', $token);
    
    if(count($partes) !== 3) {
      return null;
    }
    
    [$headerCodificado, $payloadCodificado, $assinaturaCodificada] = $partes;

    $assinaturaEsperada = hash_hmac('sha256', "$headerCodificado.$payloadCodificado", $this->secret, true);
    
    $assinaturaEsperadaCodificada = $this->base64UrlEncode($assinaturaEsperada);

    if(!hash_equals($assinaturaEsperadaCodificada, $assinaturaCodificada)) {
            return null;
    }
        
    $payload = json_decode($this->base64UrlDecode($payloadCodificado), true);

    if (!is_array($payload) || !isset($payload['exp']) || $payload['exp'] < time()) {
            return null;
    }
        
    return $payload;
  }
  
  private function base64UrlEncode(string $dados): string {
    
    return rtrim(strtr(base64_encode($dados), '+/', '-_'), '=');
  }
  
  private function base64UrlDecode(string $dados): string {
    
    $resto = strlen($dados) % 4;
    
    $padded = $resto ? str_pad($dados, strlen($dados) + (4 - $resto), '=') : $dados;
    
    return base64_decode(strtr($padded, '-_', '+/'));
  }
}