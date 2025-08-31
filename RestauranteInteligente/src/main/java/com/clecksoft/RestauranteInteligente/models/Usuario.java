package com.clecksoft.RestauranteInteligente.models;

public class Usuario {
	private int cedula;
	private String nombre;
	private String apellidos;
	private String alias;
	private String password;
	private String correo;
	private String telefono;
	private String rol;
	public int getCedula() {
		return cedula;
	}
	public void setCedula(int cedula) {
		this.cedula = cedula;
	}
	public String getNombre() {
		return nombre;
	}
	public void setNombre(String nombre) {
		this.nombre = nombre;
	}
	public String getApellidos() {
		return apellidos;
	}
	public void setApellidos(String apellidos) {
		this.apellidos = apellidos;
	}
	public String getAlias() {
		return alias;
	}
	public void setAlias(String alias) {
		this.alias = alias;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	public String getCorreo() {
		return correo;
	}
	public void setCorreo(String correo) {
		this.correo = correo;
	}
	public String getTelefono() {
		return telefono;
	}
	public void setTelefono(String telefono) {
		this.telefono = telefono;
	}
	public String getRol() {
		return rol;
	}
	public void setRol(String rol) {
		this.rol = rol;
	}
	public Usuario(int cedula, String nombre, String apellidos, String alias, String password, String correo,
			String telefono, String rol) {
		super();
		this.cedula = cedula;
		this.nombre = nombre;
		this.apellidos = apellidos;
		this.alias = alias;
		this.password = password;
		this.correo = correo;
		this.telefono = telefono;
		this.rol = rol;
	}
	public Usuario() {
	
	}
	
}
